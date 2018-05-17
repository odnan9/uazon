import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from "@angular/router";
import { ApiService } from "../../shared/services/api/api.service";
import { Location } from '@angular/common';

@Component({
  selector: 'app-pedidos.ficha.component',
  templateUrl: './pedidos.ficha.component.component.html',
  styleUrls: ['./pedidos.ficha.component.component.css']
})
export class PedidosFichaComponent implements OnInit {
  public pedido;
  public pedidosLibros;
  public users;
  public libros;
  public pedidoId;
  public autores;

  constructor(private route: ActivatedRoute, private _apiService: ApiService, private location: Location) {
    this.route.params.subscribe( params => this.pedidoId = params );
    this.getAPIPedidos();
    this.getAPIPedidosLibros();
    this.getAPILibros();
  }

  ngOnInit() {
  }

  getAPIPedidos() {
    if(localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.get('pedidos/'+this.pedidoId['id'])
        .subscribe(
          data => {
            this.pedido = data[0];
            console.log(this.pedido);
            this._apiService.get('user/'+this.pedido['fk_users'])
            .subscribe(
              data => {
                this.users = data;
                console.log(this.users);
              },
              err => console.error(err),
              () => console.log('Done loading pedidos data from API...')
            );
          },
          err => console.error(err),
          () => console.log('Done loading pedidos data from API...')
        );
      }, 100);
    }
  }

  getAPILibros() {
    if(localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.get('libros/')
        .subscribe(
          data => {
            this.libros = data;
            console.log(this.libros);
          },
          err => console.error(err),
          () => console.log('Done loading libros data from API...')
        );
      }, 100);
    }
  }

  getAPIPedidosLibros() {
    if(localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.get('pedidos_libros/'+this.pedidoId['id'])
        .subscribe(
          data => {
            this.pedidosLibros = data;
            console.log(this.pedidosLibros);
          },
          err => console.error(err),
          () => console.log('Done loading pedidos_libros data from API...')
        );
      }, 100);
    }
  }

  goBack() {
    this.location.back();
  }
}
