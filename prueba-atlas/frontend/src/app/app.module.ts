import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

// ROUTES
import { APP_ROUTING } from './app.routes';

// COMPONENTS
import { AppComponent } from './app.component';
import { UsersComponent } from './components/users/users.component';
import { UserComponent } from './components/users/user.component';
import { HeaderComponent } from './components/header/header.component';

// SERVICES
import { UsersService } from './services/users.service';

// PIPES
import { KeysPipe } from './pipes/keys.pipe';
import { FooterComponent } from './components/footer/footer.component';

// EXTERNAL
import {NgxPaginationModule} from 'ngx-pagination'; 


@NgModule({
  declarations: [
    AppComponent,
    UsersComponent,
    UserComponent,
    KeysPipe,
    HeaderComponent,
    FooterComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    APP_ROUTING,
    NgxPaginationModule
  ],
  providers: [
    UsersService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
