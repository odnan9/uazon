import { Component, OnInit } from '@angular/core';
import { ApiService } from './shared/services/api/api.service';;

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  public test;
  public title = 'Uazon CMS';
  constructor(private _apiService: ApiService) { }

  ngOnInit() {
    this.getAPIComentarios();
  }

  getAPIComentarios() {
    return this._apiService.prepareAPICall()
    .subscribe(
      data => {
        this.test = data
      },
      err => console.error(err),
      () => console.log('Token saved...')
    );
  }
}