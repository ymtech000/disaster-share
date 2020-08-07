<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertdestroysController extends Controller
{
   public function destroy($id)
    {
        $alert = \App\Alert::find($id);
      
        $alert->delete();
    
        return redirect('/alerts');
    }
}
