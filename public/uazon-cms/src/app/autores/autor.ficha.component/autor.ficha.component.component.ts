import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from "@angular/router";
import { ApiService } from "../../shared/services/api/api.service";
import { Location } from '@angular/common';

@Component({
  selector: 'app-autor.ficha.component',
  templateUrl: './autor.ficha.component.component.html',
  styleUrls: ['./autor.ficha.component.component.css']
})
export class AutorFichaComponent implements OnInit {
  public autor;
  public autorId;
  public libros;

  constructor(private route: ActivatedRoute, private _apiService: ApiService, private location: Location) {
    this.route.params.subscribe( params => this.autorId = params );
    if (this.autorId['id'] != 'new') {
      this.getAPIAutoresInfo(this.autorId);
    } else {
      this.autor = {
        nombre: "",
        autores_id: "",
        editorial: "",
        fotos_id: "",
        fotos_orden: "",
        isbn: "",
        libros_id: "",
        n_pags: "",
        num_voto: "",
        path_foto: "/images/image05_small.jpg ",
        precio: "",
        titulo: "",
        voto: "",
      }
    }
    this.getAPILibrosList();

    this.route.params.subscribe( params => console.log(params) );
  }

  ngOnInit() {
  }

  getAPIAutoresInfo(autorId) {
    if (localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.get('autores/'+this.autorId['id'])
        .subscribe(
          data => {
            this.autor = data,
              console.log(this.autor)
          },
          err => console.error(err),
          () => console.log('Done loading autor '+ this.autorId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  getAPILibrosList() {
    if (localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.get('libros/')
        .subscribe(
          data => {
            this.libros = data
          },
          err => console.error(err),
          () => console.log('Done loading libros data from API...')
        );
      }, 100);
    }
  }

  putAPIAutorInfo() {
    if (localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.put('autores/'+this.autorId['id'],this.autor)
        .subscribe(
          data => {
            return true;
          },
          err => console.error(err),
          () => console.log('Done loading autor '+ this.autorId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  postAPIAutorInfo() {
    if (localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.post('autores/',this.autor)
        .subscribe(
          data => {
            return true;
          },
          err => console.error(err),
          () => console.log('Done loading autor '+ this.autorId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  deleteAPIAutorInfo() {
    if (localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.delete('autores/'+this.autorId['id'],this.autor)
        .subscribe(
          data => {
            return true;
          },
          err => console.error(err),
          () => console.log('Done deleting autor '+ this.autorId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  imagePathChange() {
    // TODO: Detect the change of image and re-load it.
  }

  goBack() {
    this.location.back();
  }
}

