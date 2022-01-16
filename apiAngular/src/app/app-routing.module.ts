import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DashboardComponent } from './views/dashboard/dashboard.component';
import { LoginComponent } from './views/login/login.component';
import { NewComponent } from './views/new/new.component';


const routes: Routes = [
  { path: '', redirectTo:'list', pathMatch: 'full'},
  //{ path: '' , redirectTo:'login', pathMatch: 'full'},
  { path: 'login', component:LoginComponent },
  { path: 'list', component:DashboardComponent },
  { path: 'new', component:NewComponent }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
export const routingComponents = [LoginComponent,DashboardComponent,NewComponent]
