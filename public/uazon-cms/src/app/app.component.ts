import { Component, OnInit } from '@angular/core';
import { ApiService } from '../shared/services/api/api.service';;
import { Observable } from 'rxjs/Rx';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  public title = 'Uazon CMS';
  public autores;
  constructor(private _apiService: ApiService) { }

  ngOnInit() {
    // this.getAPIAutores();
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
                this.autores = data
              },
              err => console.error(err),
              () => console.log('Done loading data from API...')
            );
          }, 100);
        },
    );
  }
}