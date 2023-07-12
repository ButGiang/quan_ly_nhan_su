<?php

namespace App\Http\Services;

class UploadService {
    public function upload($request) {
        if($request->hasFile('file')) {
            try {
                // $name =  $request->file('file')->getClientOriginalName();
                // $link = 'pics/' .date('Y/m/d');
                // $request->file('file')->storeAs(
                //     'public/'. $link, $name
                // );

                // return '/public/'. $link. '/'. $name;
                $imageName = time().'.'.$request->avatar->extension();  
     
                $request->image->storeAs('images', $imageName);
                return back()
                ->with('success','You have successfully upload image.')
                ->with('image',$imageName); 
            }
            catch(exception $e) {
                return false;
            }
        }
    }
}
