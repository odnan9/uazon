import { Component, OnInit } from '@angular/core';
import { ApiService } from '../shared/services/api/api.service';
import { LibrosCustomRenderComponent } from "../libros/libros-custom-render.component";
import { ComentariosCustomRenderComponent } from "./comentarios-custom-render.component";
import { ComentariosValidadoCustomRenderComponent } from "./comentarios-validado-custom-render.component";

@Component({
  selector: 'app-comentarios',
  templateUrl: './comentarios.component.html',
  styleUrls: ['./comentarios.component.css']
})
export class ComentariosComponent implements OnInit {
  public comentarios;
  public settings = {};

  constructor(private _apiService: ApiService) { }

  ngOnInit() {
    this.getAPIComentarios();
    this.settings = {
      actions: {
        columnTitle: '',
        add: false,
        delete: false,
        edit: false,
        position: 'right'
      },
      columns: {
        comentarios_id: {
          title: 'ID',
          width: '1%',
          sort: true,
          editable: false,
          filter: false,
        },
        autor: {
          title: 'Autor del comentario',
          width: '35%',
          sort: true,
          type: 'custom',
          filter: false,
          renderComponent: ComentariosCustomRenderComponent,
        },
        validado: {
          title: 'Validado',
          width: '1%',
          sort: true,
          editable: false,
          filter: false,
          type: 'custom',
          renderComponent: ComentariosValidadoCustomRenderComponent
        }
      }
    };
  }

  getAPIComentarios() {
    if(localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.get('comentarios')
        .subscribe(
          data => {
            this.comentarios = data
          },
          err => console.error(err),
          () => console.log('Done loading comentarios data from API...')
        );
      }, 100);
    }
  }
}
