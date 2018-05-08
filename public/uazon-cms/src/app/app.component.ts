import { Component, OnInit } from '@angular/core';
import { ApiService } from '../shared/services/api/api.service';;

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
  }
}