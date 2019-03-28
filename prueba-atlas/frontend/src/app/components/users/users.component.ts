import { Component, OnInit } from '@angular/core';
import { UsersService } from '../../services/users.service';


@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.css']
})

  
export class UsersComponent implements OnInit {

  users: any = [];
  public statusOK: boolean;
  public pageActual: number = 1;

  constructor( private usersService: UsersService ) {

    this.usersService.getUsers( ).subscribe(
      (data) => {   

        this.users = data;
       
      });
  }

  ngOnInit() {
  }


  deleteUser(id: string) {

    this.usersService.deleteUser(id).subscribe(

      (data) => {

        this.statusOK = (data['status'] === 'OK') ? true : false;
        
        delete this.users[id];
      }
        
    )
  }


}
