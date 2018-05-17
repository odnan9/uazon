import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PedidosUserCustomRenderComponent } from './pedidos-user-custom-render.component';

describe('PedidosUserCustomRenderComponent', () => {
  let component: PedidosUserCustomRenderComponent;
  let fixture: ComponentFixture<PedidosUserCustomRenderComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PedidosUserCustomRenderComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PedidosUserCustomRenderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
