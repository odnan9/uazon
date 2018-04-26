import { Component } from '@angular/core';
import {ApiService} from '../shared/services/api/api.service';;
import {Observable} from 'rxjs/Rx';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Uazon CMS';

  public autores;
  constructor(private _apiService: ApiService) { }

  ngOnInit() {
    this.getAutores();
  }

  getAutores() {
    this._apiService.get('autores').subscribe(
        data => { this.autores = data },
        err => console.error(err),
        () => console.log('done loading foods')
    );
  }
}

