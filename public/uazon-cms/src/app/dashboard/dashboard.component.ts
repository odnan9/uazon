import { Component, OnInit } from '@angular/core';
import { ApiService } from '../shared/services/api/api.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  public autores;
  public libros;
  constructor(private _apiService: ApiService) { }

  ngOnInit() {
    this.getAPIAutores();
    this.getAPILibros();
  }

  getAPIAutores() {
    if (localStorage.getItem('uazon_api_token')) {
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
    }
  }
  getAPILibros() {
    if (localStorage.getItem('uazon_api_token')) {
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
    }
  }
}