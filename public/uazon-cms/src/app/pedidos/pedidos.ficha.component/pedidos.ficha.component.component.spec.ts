import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { Pedidos.Ficha.ComponentComponent } from './pedidos.ficha.component.component';

describe('Pedidos.Ficha.ComponentComponent', () => {
  let component: Pedidos.Ficha.ComponentComponent;
  let fixture: ComponentFixture<Pedidos.Ficha.ComponentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ Pedidos.Ficha.ComponentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(Pedidos.Ficha.ComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
