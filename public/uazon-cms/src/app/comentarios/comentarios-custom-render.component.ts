import { Component, Input, OnInit } from '@angular/core';

@Component({
  templateUrl: './comentarios-custom-render.component.html',
})
export class ComentariosCustomRenderComponent implements OnInit {
  public renderValue: string;

  @Input() value: string | number;
  @Input() rowData: any;

  constructor() { }

  ngOnInit() {
    this.renderValue = this.value.toString();
  }
}
