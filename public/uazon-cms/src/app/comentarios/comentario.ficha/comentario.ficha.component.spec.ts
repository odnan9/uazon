import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { Comentario.FichaComponent } from './comentario.ficha.component';

describe('Comentario.FichaComponent', () => {
  let component: Comentario.FichaComponent;
  let fixture: ComponentFixture<Comentario.FichaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ Comentario.FichaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(Comentario.FichaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
