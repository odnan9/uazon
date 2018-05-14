import { Component, OnInit } from '@angular/core';
import { ApiService } from "../../shared/services/api/api.service";
import { Location } from "@angular/common";
import { ActivatedRoute } from "@angular/router";

@Component({
  selector: 'app-comentario.ficha',
  templateUrl: './comentario.ficha.component.html',
  styleUrls: ['./comentario.ficha.component.css']
})
export class ComentarioFichaComponent implements OnInit {
  public comentario;
  public comentarioId;
  public libros;

  constructor(private route: ActivatedRoute, private _apiService: ApiService, private location: Location) {
    this.route.params.subscribe( params => this.comentarioId = params );
    if (this.comentarioId['id'] != 'new') {
      this.getAPIComentarioInfo();
    } else {
      this.comentario = {
        comentarios_id: "",
        autor: "",
        descripcion: "",
        validado: "",
        fk_libros: ""
      }
    }
    this.getAPILibrosList();
  }

  ngOnInit() { }

  getAPIComentarioInfo() {
    if(localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.get('comentarios/'+this.comentarioId['id'])
        .subscribe(
          data => {
            this.comentario = data,
              console.log(this.comentario)
          },
          err => console.error(err),
          () => console.log('Done loading commentarios '+ this.comentarioId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  getAPILibrosList() {
    if(localStorage.getItem('uazon_api_token')) {
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

  putAPIComentarioInfo() {
    if(localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.put('comentarios/'+this.comentarioId['id'],this.comentario)
        .subscribe(
          data => {
            return true;
          },
          err => console.error(err),
          () => console.log('Done loading comentario '+ this.comentarioId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  postAPIComentarioInfo() {
    if(localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.post('comentarios/',this.comentario)
        .subscribe(
          data => {
            return true;
          },
          err => console.error(err),
          () => console.log('Done loading comentario '+ this.comentarioId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  deleteAPIComentarioInfo() {
    if(localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.delete('comentarios/'+this.comentarioId['id'],this.comentario)
        .subscribe(
          data => {
            return true;
          },
          err => console.error(err),
          () => console.log('Done deleting comentario '+ this.comentarioId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  goBack() {
    this.location.back();
  }
}
