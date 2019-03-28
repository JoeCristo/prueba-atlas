import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { User } from '../interfaces/user.interface';



@Injectable({
  providedIn: 'root'
})



export class UsersService implements OnInit {

  private createUrl = 'http://localhost/prueba-atlas/backend/web/app_dev.php/users/create';
  private updateUrl = 'http://localhost/prueba-atlas/backend/web/app_dev.php/users/update';
  private getUserUrl = 'http://localhost/prueba-atlas/backend/web/app_dev.php/users/getUser';
  private getUsersUrl = 'http://localhost/prueba-atlas/backend/web/app_dev.php/users/get/users';
  private checkUserUrl = 'http://localhost/prueba-atlas/backend/web/app_dev.php/users/checkUser';
  private deleteUserUrl = 'http://localhost/prueba-atlas/backend/web/app_dev.php/users/deleteUser';


  constructor( private httpClient: HttpClient ) { }

  ngOnInit() {}



  public createUser( user: User ) {

    const DATA_CREATE = JSON.stringify( user );

    return this.httpClient.post( this.createUrl, DATA_CREATE );

  }



  public updateUser( user: User, id: string) {

    const DATA_UPDATE = JSON.stringify( user );
    let url = `${ this.updateUrl }/${ id }`;

    return this.httpClient.put( url, DATA_UPDATE );

  }



  public getUser( id: string) {

    let url = `${ this.getUserUrl }/${ id }`;

    return this.httpClient.get( url ); 
  }



  public getUsers() {

    return this.httpClient.get( this.getUsersUrl );
  }



  public checkIfIssetUser( user: User ) {

    const DATA_CREATE = JSON.stringify( user );

    return this.httpClient.post( this.checkUserUrl, DATA_CREATE );
  }



  public deleteUser(id: string) {

    let url = `${ this.deleteUserUrl }/${ id }`;

    return this.httpClient.delete( url );
  }
}
