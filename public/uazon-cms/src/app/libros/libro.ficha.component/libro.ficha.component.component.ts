import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from "@angular/router";
import { ApiService } from "../../../shared/services/api/api.service";

@Component({
  selector: 'app-libro.ficha.component',
  templateUrl: './libro.ficha.component.component.html',
  styleUrls: ['./libro.ficha.component.component.css']
})
export class LibroFichaComponent implements OnInit {
  public libro;
  public libroId;

  constructor(private route: ActivatedRoute, private _apiService: ApiService) {
    this.route.params.subscribe( params => this.libroId = params );
    this.getAPILibroInfo(this.libroId);
  }

  ngOnInit() {
  }

  getAPILibroInfo(libroId) {
    return this._apiService.prepareAPICall()
    .subscribe(
      data => {
        this._apiService.setToken(data),
          setTimeout(() => {
            this._apiService.get('libros/'+this.libroId['id'])
            .subscribe(
              data => {
                this.libro = data,
                  console.log(data)
              },
              err => console.error(err),
              () => console.log('Done loading libro'+ this.libroId['id'] +' data from API...')
            );
          }, 100);
      },
    );
  }

  putAPILibroInfo() {
    return this._apiService.prepareAPICall()
    .subscribe(
      data => {
        this._apiService.setToken(data),
          setTimeout(() => {
            this._apiService.put('libros/'+this.libroId['id'],this.libro)
            .subscribe(
              data => {
                console.log(data)
                return true;
              },
              err => console.error(err),
              () => console.log('Done loading libro'+ this.libroId['id'] +' data from API...')
            );
          }, 100);
      },
    );
  }

  deleteAPILibroInfo() {
    return this._apiService.prepareAPICall()
    .subscribe(
      data => {
        this._apiService.setToken(data),
          setTimeout(() => {
            this._apiService.delete('libros/'+this.libroId['id'],this.libro)
            .subscribe(
              data => {
                console.log(data)
                return true;
              },
              err => console.error(err),
              () => console.log('Done deletingsound libro'+ this.libroId['id'] +' data from API...')
            );
          }, 100);
      },
    );
  }
  salvarCambios() {
    console.log(this.libro);
  }
}
