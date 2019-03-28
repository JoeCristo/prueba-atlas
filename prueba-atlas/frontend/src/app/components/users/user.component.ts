import { Component, OnInit } from '@angular/core';
import { NgForm, FormGroup, FormControl, Validators } from '@angular/forms';
import { User } from '../../interfaces/user.interface';
import { UsersService } from '../../services/users.service';
import { Router, ActivatedRoute } from '@angular/router';



@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})



export class UserComponent implements OnInit {

  user: User = {

    fullName: '',
    email: '',
    document: '',
    newsletter: true,
    captation: '',
    address: '',
    zipCode: '',
    area: '',
    city: '',
    country: '',
    comments: ''

  };

  private new = false;
  private id: string;
  private form: any;
  public statusOK: boolean;


  constructor( private usersService: UsersService,
               private router: Router,
               private activatedRoute: ActivatedRoute ) {

    
    this.activatedRoute.params
          .subscribe( params => {
  
            this.id = params['id'];
  
            this.getUser();
          });
  }


  ngOnInit() {
  }



  public saveUser(form: NgForm) {

    this.form = form;

    this.checkIssetUser();
  }



  public addNew(form: NgForm) {

    this.router.navigate(['/user', 'new' ]);

    form.reset();
  }



  public createUser() {

    this.usersService.createUser( this.user ).subscribe(
      (data: object) => {

        this.router.navigate(['/user', data['id'] ]);

        this.statusOK = (data['status'] === 'OK') ? true : false;
        
    },
    error => console.error(error));
  }



  public updateUser() {

    this.usersService.updateUser( this.user, this.id ).subscribe(
      (data: object) => {

        this.router.navigate(['/user', this.id]);
    },
    error => console.error(error));
  }



  public formReset(form: NgForm) {

    this.router.navigate(['/user', 'new' ]);

    form.reset({
      newsletter: true
    });
  }



  public checkIssetUser() {

    this.usersService.checkIfIssetUser( this.user ).subscribe(
      (data: object) => {

        if (data['isset'] === true) {


          if (confirm('El usuario se encuentra registrado, ¿Desea editar sus datos?') === true) {

            this.router.navigate(['/user', data['id']]);
            this.getUser();
  
          } else {

            this.form.reset();
            this.router.navigate(['/user', 'new' ]);
          } 


        } else {


          if (this.id === 'new') {
            this.createUser();
          } else {
            this.updateUser();
          }

        }

    },
    error => console.error(error));
  }




  public getUser() {

    if (this.id !== 'new') {

      this.usersService.getUser( this.id ).subscribe(
        (data) => {
          this.user.fullName = data['fullName'];
          this.user.email = data['email'];
          this.user.document = data['document'];
          this.user.newsletter = data['newsletter'];
          this.user.captation = data['captation'];
          this.user.address = data['address'];
          this.user.zipCode = data['zipCode'];
          this.user.area = data['area'];
          this.user.city = data['city'];
          this.user.country = data['country'];
          this.user.comments = data['comments'];
        });
    }

  }

  


}
