import { Component, OnInit } from '@angular/core';
import { ApiService } from '../shared/services/api/api.service';
import { PedidosIdCustomRenderComponent } from "./pedidos-id-custom-render/pedidos-id-custom-render.component";
import { PedidosUserCustomRenderComponent } from "./pedidos-user-custom-render/pedidos-user-custom-render.component";

@Component({
  selector: 'app-pedidos',
  templateUrl: './pedidos.component.html',
  styleUrls: ['./pedidos.component.css']
})
export class PedidosComponent implements OnInit {
  public pedidos;
  public settings = {};

  constructor(private _apiService: ApiService) { }

  ngOnInit() {
    this.getAPIPedidos();
    this.settings = {
      actions: {
        columnTitle: '',
        add: false,
        delete: false,
        edit: false,
        position: 'right'
      },
      columns: {
        pedidos_id: {
          title: 'ID de compra',
          width: '3%',
          sort: true,
          editable: false,
          filter: true,
          type: 'custom',
          renderComponent: PedidosIdCustomRenderComponent
        },
        fecha: {
          title: 'Fecha del pedido',
          width: '6%',
          sort: true,
          editable: false,
          filter: true
        },
        total: {
          title: 'Total del pedido',
          width: '4%',
          sort: false,
          editable: false,
          filter: false
        },
        name: {
          title: 'Usuario',
          width: '15%',
          sort: true,
          editable: false,
          filter: true,
          type: 'custom',
          renderComponent: PedidosUserCustomRenderComponent
        }
      }
    };
  }

  getAPIPedidos() {
    if(localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.get('pedidos')
        .subscribe(
          data => {
            this.pedidos = data,
              console.log(data)
          },
          err => console.error(err),
          () => console.log('Done loading pedidos data from API...')
        );
      }, 100);
    }
  }
}