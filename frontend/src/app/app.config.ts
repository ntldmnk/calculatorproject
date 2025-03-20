import { ApplicationConfig, importProvidersFrom, provideZoneChangeDetection } from '@angular/core';
import { provideRouter } from '@angular/router';
import { provideAnimations } from '@angular/platform-browser/animations';
import { routes } from './app.routes';
import { provideHttpClient } from '@angular/common/http';
import { MatDialogModule } from '@angular/material/dialog';

export const appConfig: ApplicationConfig = {
  providers: [ importProvidersFrom(MatDialogModule),provideAnimations(),provideHttpClient(),provideZoneChangeDetection({ eventCoalescing: true }), provideRouter(routes)]
};
