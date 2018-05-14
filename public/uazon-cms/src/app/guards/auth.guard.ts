import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { Observable } from 'rxjs';
import { UserAccessService } from "../shared/services/useraccess.service";
import { Router } from '@angular/router';

@Injectable()
export class AuthGuard implements CanActivate {
  LocalStorageService;

  constructor(private UserAccessService: UserAccessService, private route: Router) {
    this.LocalStorageService = localStorage;
  };

  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
    if(localStorage.getItem('uazon_api_token')) {
      return true;
    }else{
      this.route.navigate(["login"]);
      return false;
    }
  }
}
