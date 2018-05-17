import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-pedidos-id-custom-render',
  templateUrl: './pedidos-id-custom-render.component.html',
  styleUrls: ['./pedidos-id-custom-render.component.css']
})
export class PedidosIdCustomRenderComponent implements OnInit {
  renderValue: string;

  @Input() value: string | number;
  @Input() rowData: any;

  ngOnInit() {
    this.renderValue = this.value.toString();
  }
}
