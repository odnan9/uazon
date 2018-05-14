import { Component, OnInit } from '@angular/core';
import { UserAccessService } from "../services/useraccess.service";

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  islogged: boolean;
  userName: string;

  constructor(private auth: UserAccessService) {
    let token = localStorage.getItem('uazon_token');
    this.userName = localStorage.getItem('uazon_user');
    this.islogged = localStorage.getItem('uazon_token') ? true : false;
  }

  ngOnInit() {
    this.auth.getLoggedInUser.subscribe(data => {
      this.userName =  data['name'];
      this.islogged = localStorage.getItem('uazon_token') ? true : false;
    });
  }

  logout() {
    this.auth.logout();
  }
}
