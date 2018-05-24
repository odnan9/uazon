import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { UserAccessService } from "../shared/services/useraccess.service";
import { Router } from '@angular/router';

@Injectable()
export class AuthGuard implements CanActivate {
  LocalStorageService;

  constructor(private UserAccessService: UserAccessService, private route: Router) {
    this.LocalStorageService = localStorage;
  };

  canActivate(next: ActivatedRouteSnapshot,state: RouterStateSnapshot): boolean
  {
    if(!this.UserAccessService.isLoggedIn()) {
      this.route.navigate(['/login'], { queryParams: { returnUrl: state.url }});
      return false;
    }
    return true;
  }
}
