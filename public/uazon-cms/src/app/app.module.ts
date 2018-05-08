import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { ApiService } from '../shared/services/api/api.service';
import { AppComponent } from './app.component';
import { RouterModule, Routes } from '@angular/router';
import { PassportComponent } from './passport/passport.component';
import { LibrosComponent } from './libros/libros.component';
import { LibroFichaComponent } from './libros/libro.ficha.component/libro.ficha.component.component';
import { AutoresComponent } from './autores/autores.component';
import { AutorFichaComponent } from './autores/autor.ficha.component/autor.ficha.component.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { Ng2SmartTableModule } from 'ng2-smart-table';
import { PageNotFoundComponent} from './pagenotfound/pagenotfound.component';
import { LibrosCustomRenderComponent } from "./libros/libros-custom-reder.component";

const appRoutes: Routes = [
    { path: 'dashboard', component: DashboardComponent },
    { path: 'libros', component: LibrosComponent },
    { path: 'libros/:id', component: LibroFichaComponent },
    { path: 'autores', component: AutoresComponent },
    { path: 'autores/:id', component: AutorFichaComponent },
    { path: '',
        redirectTo: '/dashboard',
        pathMatch: 'full'
    },
    { path: '**', component: PageNotFoundComponent }
];

@NgModule({
    declarations: [
        AppComponent,
        PassportComponent,
        LibrosComponent,
        AutoresComponent,
        DashboardComponent,
        PageNotFoundComponent,
        LibrosCustomRenderComponent,
        LibroFichaComponent,
        AutorFichaComponent
    ],
    entryComponents: [LibrosCustomRenderComponent],
    imports: [
        RouterModule.forRoot(
            appRoutes,
            { enableTracing: true }
        ),
        BrowserModule,
        HttpClientModule,
        FormsModule,
        NgbModule.forRoot(),
        Ng2SmartTableModule
    ],
    providers: [ ApiService ],
    bootstrap: [ AppComponent ]
})
export class AppModule { }
