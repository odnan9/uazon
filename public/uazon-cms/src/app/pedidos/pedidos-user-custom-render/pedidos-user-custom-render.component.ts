import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-pedidos-user-custom-render',
  templateUrl: './pedidos-user-custom-render.component.html',
  styleUrls: ['./pedidos-user-custom-render.component.css']
})
export class PedidosUserCustomRenderComponent implements OnInit {
  renderValue: string;

  @Input() value: string | number;
  @Input() rowData: any;

  ngOnInit() {
    this.renderValue = this.value.toString();
  }
}
