import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PedidosIdCustomRenderComponent } from './pedidos-id-custom-render.component';

describe('PedidosIdCustomRenderComponent', () => {
  let component: PedidosIdCustomRenderComponent;
  let fixture: ComponentFixture<PedidosIdCustomRenderComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PedidosIdCustomRenderComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PedidosIdCustomRenderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
