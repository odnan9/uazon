import {Component, Input, Output, OnInit, EventEmitter} from '@angular/core';
import { ApiService } from '../shared/services/api/api.service';

@Component({
  selector: 'comentario-validado',
  templateUrl: './comentarios-validado-custom-render.component.html',
})
export class ComentariosValidadoCustomRenderComponent implements OnInit {
  renderValue: string;

  @Input() value: boolean;
  @Input() rowData: any;

  constructor(private _apiService: ApiService) { }

  ngOnInit() { }

  changeValueValidacion() {
    if(localStorage.getItem('uazon_api_token')) {
      setTimeout(() => {
        this._apiService.put('comentarios/'+this.rowData['comentarios_id'], {'validado': this.value})
        .subscribe(
          data => {
            console.log(data)
          },
          err => console.error(err),
          () => console.log('Done changing validation value using API...')
        );
      }, 100);
    }
  }
}
