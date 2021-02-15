public function boot()
{
  if(config('app.force_ssl')){
    ¥URL::forceScheme('https');
  }
}