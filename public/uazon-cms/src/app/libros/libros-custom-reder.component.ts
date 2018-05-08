import { Component, Input, OnInit } from '@angular/core';

@Component({
  templateUrl: './libros.custom.render.component.html',
})
export class LibrosCustomRenderComponent implements OnInit {

  renderValue: string;

  @Input() value: string | number;
  @Input() rowData: any;

  ngOnInit() {
    this.renderValue = this.value.toString();
  }
}
