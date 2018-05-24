import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from "@angular/router";
import { ApiService } from "../../shared/services/api/api.service";
import { Location } from '@angular/common';

@Component({
  selector: 'app-libro.ficha.component',
  templateUrl: './libro.ficha.component.component.html',
  styleUrls: ['./libro.ficha.component.component.css']
})
export class LibroFichaComponent implements OnInit {
  public libro;
  public libroId;
  public autores;

  constructor(private route: ActivatedRoute, private _apiService: ApiService, private location: Location) {
    this.route.params.subscribe( params => this.libroId = params );
    if (this.libroId['id'] != 'new') {
      this.getAPILibroInfo();
    } else {
      this.libro = {
        autor: "",
        autores_id: "",
        editorial: "",
        fotos_id: "",
        fotos_orden: "",
        isbn: "",
        libros_id: "",
        n_pags: "",
        num_voto: "",
        path_foto: "/images/image05_small.jpg ",
        precio: "",
        titulo: "",
        voto: "",
      }
    }
    this.getAPIAutoresList();
  }

  ngOnInit() { }

  getAPILibroInfo() {
    if (localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.get('libros/'+this.libroId['id'])
        .subscribe(
          data => {
            this.libro = data[0],
              console.log(this.libro)
          },
          err => console.error(err),
          () => console.log('Done loading libro '+ this.libroId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  getAPIAutoresList() {
    if (localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.get('autores/')
        .subscribe(
          data => {
            this.autores = data
          },
          err => console.error(err),
          () => console.log('Done loading autores data from API...')
        );
      }, 100);
    }
  }


  putAPILibroInfo() {
    if (localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.put('libros/'+this.libroId['id'],this.libro)
        .subscribe(
          data => {
            return true;
          },
          err => console.error(err),
          () => console.log('Done loading libro '+ this.libroId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  postAPILibroInfo() {
    if (localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.post('libros/',this.libro)
        .subscribe(
          data => {
            return true;
          },
          err => console.error(err),
          () => console.log('Done loading libro '+ this.libroId['id'] +' data from API...')
        );
      }, 100);
    }
  }

  deleteAPILibroInfo() {
    if (localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.delete('libros/'+this.libroId['id'],this.libro)
        .subscribe(
          data => {
            return true;
          },
          err => console.error(err),
          () => console.log('Done deleting libro '+this.libroId['id']+' data from API...')
        );
      }, 100);
    }
  }

  imagePathChange() {
    // TODO: Detect the change of image and re-load it.
  }

  uploadImage() {
    // TODO: Implement the upload of image of the cover for each book and/or author/
    // Laravel API is already implemented at .../uazon/app/Http/Controllers/uploadController.php
    // https://nehalist.io/uploading-files-in-angular2/
  }

  loadComentariosLibro() {
    // TODO: List all comments for this book in the book's file page.
  }

  goBack() {
    this.location.back();
  }
}
