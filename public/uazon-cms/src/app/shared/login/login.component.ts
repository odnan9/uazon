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
    console.log('ODNAN00000000000000000000');
    this.auth.logout();
    console.log('ODNAN00000000000000000001');
    this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/';
    console.log('ODNAN00000000000000000002');
  }

  login() {
    console.log('ODNAN00000000000000000003');
    this.loading = false;
    console.log('ODNAN00000000000000000004');
      this.auth.login(this.model.email, this.model.password)
      .subscribe(
        data => {
          console.log('ODNAN00000000000000000005');
          console.log(this.returnUrl);
          this.router.navigate([this.returnUrl]);
          console.log('ODNAN00000000000000000006');
        },
        error => {
          console.error(error);
          this.loading = false;
        });
  }
}
