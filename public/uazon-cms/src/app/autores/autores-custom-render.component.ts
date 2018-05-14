import { Component, Input, OnInit } from '@angular/core';

@Component({
  templateUrl: './autores-custom-render.component.html'
})
export class AutoresCustomRenderComponent implements OnInit {
  renderValue: string;

  @Input() value: string | number;
  @Input() rowData: any;

  ngOnInit() {
    this.renderValue = this.value.toString();
  }
}
