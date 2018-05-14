import { Component, OnInit } from '@angular/core';
import { ApiService } from '../shared/services/api/api.service';
import { AutoresCustomRenderComponent } from "./autores-custom-render.component";

@Component({
  selector: 'app-autores',
  templateUrl: './autores.component.html',
  styleUrls: ['./autores.component.css']
})
export class AutoresComponent implements OnInit {
  public autores;
  public settings = {};

  constructor(private _apiService: ApiService) { }

  ngOnInit() {
    this.getAPIAutores();
    this.settings = {
      actions: {
        columnTitle: '',
        add: false,
        delete: false,
        edit: false,
        position: 'right'
      },
      columns: {
        autores_id: {
          title: 'ID',
          width: '6%',
          sort: true,
          editable: false
        },
        nombre: {
          title: 'Nombre del autor',
          width: '35%',
          sort: true,
          type: 'custom',
          renderComponent: AutoresCustomRenderComponent,
        }
      }
    };
  }

  getAPIAutores() {
    return this._apiService.prepareAPICall()
    .subscribe(
      data => {
        this._apiService.setToken(data),
          setTimeout(() => {
            this._apiService.get('autores')
            .subscribe(
              data => {
                this.autores = data,
                  console.log(data)
              },
              err => console.error(err),
              () => console.log('Done loading autores data from API...')
            );
            }, 100);
        },
    );
  }
}
