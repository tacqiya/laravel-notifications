use App\Notifications\RegistrationSuccessful;

public function registerpost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | string | max:255',
            'email' => 'required | string | email | max:255 | unique:users',
            'password' => 'required | string | min:8 | max:15',
            'hobbies' => 'nullable | array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'hobbies' => $request->hobbies,
        ]);
        if($user){
         
            $adminUsers = User::where('usertype', 'admin')->get();
            foreach ($adminUsers as $admin) {
                $admin->notify(new RegistrationSuccessful($user));
            }
            return redirect('/login')->with('success', 'Registration successful');
        }else{
            return redirect('/register')->with("failed","something went rong!");
        }
    }

  public function markAsRead()
  {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
   }