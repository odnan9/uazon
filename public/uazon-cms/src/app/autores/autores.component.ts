import { Component, OnInit } from '@angular/core';
import { ApiService } from '../../shared/services/api/api.service';

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
        columnTitle: 'WHAT??',
        add: true,
        delete: true,
        edit: true,
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
          sort: true
        }
      }
    };
  }

  getAPIAutores() {
    return this._apiService.getData()
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
    );}
}
