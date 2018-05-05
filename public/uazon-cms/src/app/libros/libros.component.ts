import { Component, OnInit } from '@angular/core';
import { ApiService } from '../../shared/services/api/api.service';

@Component({
  selector: 'app-libros',
  templateUrl: './libros.component.html',
  styleUrls: ['./libros.component.css']
})
export class LibrosComponent implements OnInit {
  public libros;
  public settings = {};

  constructor(private _apiService: ApiService) { }

  ngOnInit() {
    this.getAPILibros();
    this.settings = {
      actions: {
        columnTitle: 'WHAT??',
        add: true,
        delete: true,
        edit: true,
        position: 'right'
      },
      columns: {
        libros_id: {
          title: 'ID',
          width: '6%',
          sort: true,
          editable: false
        },
        titulo: {
          title: 'Título del libro',
          width: '35%',
          sort: true
        },
        editorial: {
          title: 'Editorial',
          width: '35%',
          sort: true
        },
        isbn: {
          title: 'ISBN',
          width: '15%',
          sort: true
        }
      }
    };
  }

  getAPILibros() {
    return this._apiService.getData()
    .subscribe(
      data => {
             this._apiService.setToken(data),
             setTimeout(() => {
               this._apiService.get('libros')
               .subscribe(
                 data => {
                   this.libros = data,
                   console.log(data)
                 },
                 err => console.error(err),
                 () => console.log('Done loading libros data from API...')
               );
             }, 100);
           },
    );
  }
}