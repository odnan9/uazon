import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { Libro.Ficha.ComponentComponent } from './libro.ficha.component.component';

describe('Libro.Ficha.ComponentComponent', () => {
  let component: Libro.Ficha.ComponentComponent;
  let fixture: ComponentFixture<Libro.Ficha.ComponentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ Libro.Ficha.ComponentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(Libro.Ficha.ComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
