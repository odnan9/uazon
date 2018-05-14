import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';
import { UserAccessService } from '../services/useraccess.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  model: any = {};
  loading: false;
  returnUrl: string;

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private fb: FormBuilder,
    private auth: UserAccessService) {}

  ngOnInit() {
    this.auth.logout();
    this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/';
  }

  login() {
    this.loading = false;
      this.auth.login(this.model.email, this.model.password)
      .subscribe(
        data => {
          this.router.navigate([this.returnUrl]);
          console.log(data);
        },
        error => {
          console.error(error);
          this.loading = false;
        });
  }
}
