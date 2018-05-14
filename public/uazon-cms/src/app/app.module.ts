//
// Angular and third parties
// =========================================================================================================
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { RouterModule, Routes } from '@angular/router';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { Ng2SmartTableModule } from 'ng2-smart-table';
//
// App entry
// =========================================================================================================
import { AppComponent } from './app.component';
//
// App views
// =========================================================================================================
import { DashboardComponent } from './dashboard/dashboard.component';
import { LibrosComponent } from './libros/libros.component';
import { LibroFichaComponent } from './libros/libro.ficha.component/libro.ficha.component.component';
import { LibrosCustomRenderComponent } from "./libros/libros-custom-render.component";
import { AutoresComponent } from './autores/autores.component';
import { AutorFichaComponent } from './autores/autor.ficha.component/autor.ficha.component.component';
import { AutoresCustomRenderComponent } from './autores/autores-custom-render.component';
import { ComentariosComponent } from './comentarios/comentarios.component';
import { ComentarioFichaComponent } from './comentarios/comentario.ficha/comentario.ficha.component';
import { ComentariosCustomRenderComponent } from './comentarios/comentarios-custom-render.component';
import { ComentariosValidadoCustomRenderComponent } from './comentarios/comentarios-validado-custom-render.component';
import { PedidosComponent } from './pedidos/pedidos.component';
import { UsuariosComponent } from './usuarios/usuarios.component';
//
// Services, guards and shared components
// =========================================================================================================
import { LoginComponent } from './shared/login/login.component';
import { PageNotFoundComponent} from './pagenotfound/pagenotfound.component';
import { HeaderComponent } from './shared/header/header.component';
import { ApiService } from './shared/services/api/api.service';
import { AuthGuard } from "./guards/auth.guard";
import { UserAccessService } from "./shared/services/useraccess.service";


const appRoutes: Routes = [
  {
    path: 'login',
    component: LoginComponent
  },
  {
    path: 'logout',
    redirectTo: '/login',
    pathMatch: 'full',
    // component: LoginComponent
  },
  {
    path: 'dashboard',
    component: DashboardComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'libros',
    component: LibrosComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'libros/:id',
    component: LibroFichaComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'autores',
    component: AutoresComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'autores/:id',
    component: AutorFichaComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'comentarios',
    component: ComentariosComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'comentarios/:id',
    component: ComentarioFichaComponent,
    canActivate: [AuthGuard]
  },
  {
    path: '',
    redirectTo: '/dashboard',
    pathMatch: 'full',
    canActivate: [AuthGuard]
  },
  {
    path: 'register',
    redirectTo: 'http://www.prowebproject.com/register',
  },
  {
    path: '**',
    component: PageNotFoundComponent
  }
];

@NgModule({
  declarations: [
    AppComponent,
    LibrosComponent,
    AutoresComponent,
    DashboardComponent,
    PageNotFoundComponent,
    LibrosCustomRenderComponent,
    LibroFichaComponent,
    AutorFichaComponent,
    HeaderComponent,
    LoginComponent,
    AutoresCustomRenderComponent,
    PedidosComponent,
    ComentariosComponent,
    ComentarioFichaComponent,
    UsuariosComponent,
    ComentariosCustomRenderComponent,
    ComentariosValidadoCustomRenderComponent
  ],
  entryComponents: [
    LibrosCustomRenderComponent,
    AutoresCustomRenderComponent,
    ComentariosCustomRenderComponent,
    ComentariosValidadoCustomRenderComponent
  ],
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
  providers: [
    ApiService,
    UserAccessService,
    AuthGuard
  ],
  bootstrap: [ AppComponent ]
})
export class AppModule { }
