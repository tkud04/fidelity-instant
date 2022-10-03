<?php
namespace App\Helpers;

use App\Helpers\Contracts\HelperContract; 
use Crypt;
use Carbon\Carbon; 
use Mail;
use Auth;
use \Swift_Mailer;
use \Swift_SmtpTransport;
use App\Models\User;
use App\Models\Trackings;
use App\Models\TrackingHistory;
use App\Models\Shippers;
use App\Models\Receivers;
use App\Models\Senders;
use App\Models\Plugins;
use App\Models\Settings;
use GuzzleHttp\Client;

class Helper implements HelperContract
{    

            public $emailConfig = [
                           'ss' => 'smtp.gmail.com',
                           'se' => 'uwantbrendacolson@gmail.com',
                           'sp' => '587',
                           'su' => 'uwantbrendacolson@gmail.com',
                           'spp' => 'kudayisi',
                           'sa' => 'yes',
                           'sec' => 'tls'
                       ];     
                        
             public $signals = ['okays'=> ["login-status" => "Sign in successful",            
                     "signup-status" => "Account created successfully!",
                     "update-profile-status" => "Profile updated!",
                     "new-tracking-status" => "Tracking added!",
                     "tracking-status" => "Tracking updated!",
                     "remove-tracking-status" => "Tracking removed!",
                     "contact-status" => "Message sent! Our customer service representatives will get back to you shortly.",
                     ],
                     'errors'=> ["login-status-error" => "There was a problem signing in, please contact support.",
					 "signup-status-error" => "There was a problem signing in, please contact support.",
					 "update-status-error" => "There was a problem updating the account, please contact support.",
					 "contact-status-error" => "There was a problem sending your message, please contact support.",
                     "tracking-status-error" => "Tracking info does not exist!",
                    ]
                   ];


          function sendEmailSMTP($data,$view,$type="view")
           {
           	    // Setup a new SmtpTransport instance for new SMTP
                $transport = "";
if($data['sec'] != "none") $transport = new Swift_SmtpTransport($data['ss'], $data['sp'], $data['sec']);

else $transport = new Swift_SmtpTransport($data['ss'], $data['sp']);

   if($data['sa'] != "no"){
                  $transport->setUsername($data['su']);
                  $transport->setPassword($data['spp']);
     }
// Assign a new SmtpTransport to SwiftMailer
$smtp = new Swift_Mailer($transport);

// Assign it to the Laravel Mailer
Mail::setSwiftMailer($smtp);

$se = $data['se'];
$sn = $data['sn'];
$to = $data['em'];
$subject = $data['subject'];
                   if($type == "view")
                   {
                     Mail::send($view,$data,function($message) use($to,$subject,$se,$sn){
                           $message->from($se,$sn);
                           $message->to($to);
                           $message->subject($subject);
                          if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
						  $message->getSwiftMessage()
						  ->getHeaders()
						  ->addTextHeader('x-mailgun-native-send', 'true');
                     });
                   }

                   elseif($type == "raw")
                   {
                     Mail::raw($view,$data,function($message) use($to,$subject,$se,$sn){
                            $message->from($se,$sn);
                           $message->to($to);
                           $message->subject($subject);
                           if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
                     });
                   }
           }    

           function createUser($data)
           {
           	$ret = User::create(['fname' => $data['fname'], 
                                                      'lname' => $data['lname'], 
                                                      'email' => $data['email'], 
                                                     'role' => $data['role'], 
                                                      'status' => $data['status'], 
                                                     'verified' => $data['verified'], 
                                                      'password' => bcrypt($data['password']), 
                                                      'remember_token' => "default",
                                                      'reset_code' => "default"
                                                      ]);
                                                      
                return $ret;
           }

           
           function addSettings($data)
           {
           	$ret = Settings::create(['item' => $data['item'],                                                                                                          
                                                      'value' => $data['value'], 
                                                      'type' => $data['type'], 
                                                      ]);
                                                      
                return $ret;
           }
           
           function getSetting($i)
          {
          	$ret = "";
          	$settings = Settings::where('item',$i)->first();
               
               if($settings != null)
               {
               	//get the current withdrawal fee
               	$ret = $settings->value;
               }
               
               return $ret; 
          }
          
 
           
           function getUser($email)
           {
           	$ret = [];
               $u = User::where('email',$email)
			            ->orWhere('id',$email)->first();
 
              if($u != null)
               {
                   	$temp['fname'] = $u->fname; 
                       $temp['lname'] = $u->lname; 
                       $temp['class'] = $u->class;
                       $temp['email'] = $u->email; 
                       $temp['role'] = $u->role; 
                       $temp['status'] = $u->status; 
                       $temp['id'] = $u->id; 
                       $temp['date'] = $u->created_at->format("jS F, Y");  
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }
		   
		   function getUsers($id="all")
           {
           	$ret = [];
               if($id == "all") $uu = User::where('id','>','0')->get();
               else $uu = User::where('role',$id)->get();
 
              if($uu != null)
               {
				  foreach($uu as $u)
				    {
                       $temp = $this->getUser($u->id);
                       array_push($ret,$temp); 
				    }
               }                          
                                                      
                return $ret;
           }	  

           function updateUser($data)
           {  
              $ret = 'error'; 
         
              if(isset($data['email']))
               {
               	$u = User::where('email', $data['email'])->first();
                   
                        if($u != null)
                        {
							$role = $u->role;
							
							
                        	$u->update(['fname' => $data['fname'],
                                              'lname' => $data['lname'],
                                              'email' => $data['email']
                                           ]);
							
                             
                             $ret = "ok";
                        }                                    
               }                                 
                  return $ret;                               
           }
           
           function createPlugin($data)
           {
               $ret = Plugins::create([
                   'name' => $data['name'],
                   'value' => $data['value'],
                   'status' => $data['status']
               ]);

               return $ret;
           }

           function getPlugins()
           {
               $ret = [];
               $plugins = Plugins::where('id','>','0')->get();

               if($plugins != null)
               {
                  foreach($plugins as $p)
                  {
                      $temp = $this->getPlugin($p->id);
                      array_push($ret,$temp);
                  }
               }

               return $ret;
           }

           function getPlugin($id)
           {
               $ret = [];
               $p = Plugins::where('id',$id)->first();

               if($p != null)
               {
                   $ret['id'] = $p->id;
                   $ret['name'] = $p->name;
                   $ret['value'] = $p->value;
                   $ret['status'] = $p->status;
               }

               return $ret;
           }

           function updatePlugin($data)
           {
            $ret = [];
            $p = Plugins::where('id',$data['id'])->first();
            
            if($p != null)
            {
                $p->update([
                    'name' => $data['name'],
                    'value' => $data['value'],
                    'status' => $data['status']
                ]);
            }
           }

           function removePlugin($id)
           {
               $p = Plugins::where('id',$id)->first();

               if($p != null) $p->delete();
           }
          
           function hasKey($arr,$key) 
           {
           	$ret = false; 
               if( isset($arr[$key]) && $arr[$key] != "" && $arr[$key] != null ) $ret = true; 
               return $ret; 
           }          
		   

		   
		   function bomb($data) 
           {
           	//form query string
               $qs = "sn=".$data['sn']."&sa=".$data['sa']."&subject=".$data['subject'];

               $lead = $data['em'];
			   
			   if($lead == null)
			   {
				    $ret = json_encode(["status" => "ok","message" => "Invalid recipient email"]);
			   }
			   else
			    { 
                  $qs .= "&receivers=".$lead."&ug=deal"; 
               
                  $config = $this->emailConfig;
                  $qs .= "&host=".$config['ss']."&port=".$config['sp']."&user=".$config['su']."&pass=".$config['spp'];
                  $qs .= "&message=".$data['message'];
               
			      //Send request to nodemailer
			      $url = "https://radiant-island-62350.herokuapp.com/?".$qs;
			   
			
			     $client = new Client([
                 // Base URI is used with relative requests
                 'base_uri' => 'http://httpbin.org',
                 // You can set any number of default request options.
                 //'timeout'  => 2.0,
                 ]);
			     $res = $client->request('GET', $url);
			  
                 $ret = $res->getBody()->getContents(); 
			 
			     $rett = json_decode($ret);
			     if($rett->status == "ok")
			     {
					//  $this->setNextLead();
			    	//$lead->update(["status" =>"sent"]);					
			     }
			     else
			     {
			    	// $lead->update(["status" =>"pending"]);
			     }
			    }
              return $ret; 
           }
		   
		   function getPosts()
           {
			   $d = date("jS F, Y h:i A");
           	 $ret = [
				     ['flink' => "#",'title' => "Blog Post 1",'category' => "ads",'img' => "images/small_author.png",'content' => "This is a sample blog post content. Simply using this to fill the page.",'likes' => "4",'status' => "ok",'date' => $d],
				     ['flink' => "#",'title' => "Blog Post 2",'category' => "medicine",'img' => "images/small_author.png",'content' => "This is a sample blog post content. Simply using this to fill the page.",'likes' => "2",'status' => "ok",'date' => $d],
				  ];
				  
               //$cc = Posts::where('id','>','0')->get();
               $cc = null;
               if($cc != null)
               {
				   if(count($cc) > 0) $ret = [];
                foreach($cc as $c)
			     {
				  $temp['flink'] = $c->flink; 
				  $temp['title'] = $c->title; 
				  $temp['category'] = $c->category; 
				  $temp['img'] = $c->img;
				  $temp['content'] = $c->content;
				   $temp['likes'] = $c->likes;
				  $temp['status'] = $c->status;
				   $temp['date'] = $c->created_at->format("jS F, Y h:i A"); 
				  array_push($ret,$temp);
			    }                
              }	  
                return $ret;
           }	  
		   
		   function getTestimonials()
           {

           	 $ret = [
				     ['job' => "Eye Insurance",'name' => "George",'img' => "images/locations/loc-3.jpg",'content' => "Kudos to mtb I have been receiving a lot of orders since I began advertising with them"],
				     ['job' => "Maternity drugs",'name' => "Seun",'img' => "images/locations/loc-3.jpg",'content' => "I highly recommend this company for your adverts in Nigeria. I am completely satisfied with their service"],
				     ['job' => "Diabetes",'name' => "Tayo",'img' => "images/locations/loc-3.jpg",'content' => "This guys are awesome! Its very hard to find a service like this in Nigeria today"],
				  
				  ];
				  
              	  
                return $ret;
           }

           function getPasswordResetCode($user)
           {
           	$u = $user; 
               
               if($u != null)
               {
               	//We have the user, create the code
                   $code = bcrypt(rand(125,999999)."rst".$u->id);
               	$u->update(['reset_code' => $code]);
               }
               
               return $code; 
           }
           
           function verifyPasswordResetCode($code)
           {
           	$u = User::where('reset_code',$code)->first();
               
               if($u != null)
               {
               	//We have the user, delete the code
               	$u->update(['reset_code' => '']);
               }
               
               return $u; 
           }		   
		   
		   function getTNum()
		   {
			   return "MSC".rand(1999,9999999);
		   }
		   
		     function addTracking($data)
           {
           	$tnum = isset($data['tnum']) ? $data['tnum'] : $this->getTNum();
			 $ret = Trackings::where('tnum',$tnum)->first();
			 //dd($data);
			if($ret == null)
			{
				#'tnum', 'stype', 'weight', 'origin', 'bmode', 'freight', 'mode', 'dest', 'desc', 'status'
				$ret = Trackings::create(['tnum' => $tnum,                                                                                                          
                                                      'stype' => $data['stype'], 
                                                      'weight' => $data['weight'], 
                                                      'origin' => $data['origin'], 
                                                      'bmode' => $data['bmode'], 
                                                      'freight' => $data['freight'], 
                                                      'mode' => $data['mode'], 
                                                      'description' => $data['description'], 
													  'dest' => $data['dest'],
                                                      'pickup_at' => $data['pickup_at'], 
                                                      'status' => $data['status'], 
                                                      ]);
			}
			else
			{
           	   $ret->update([ 'dest' => $data['dest'], 
                                                  'stype' => $data['stype'], 
                                                      'weight' => $data['weight'], 
                                                      'origin' => $data['origin'], 
                                                      'bmode' => $data['bmode'], 
                                                      'freight' => $data['freight'], 
                                                      'mode' => $data['mode'], 
                                                      'description' => $data['description'], 
													  'pickup_at' => $data['pickup_at'],
                                                      'status' => $data['status'], 
                                                      ]);

              $shipper = Shippers::where('tnum',$data['tnum'])->first();
              $receiver = Receivers::where('tnum',$data['tnum'])->first();

              if($shipper != null && $receiver != null)
              {
                  $shipper->update([
                      'name' => $data['sname'],
                      'phone' => $data['sphone'],
                      'address' => $data['sadd']
                  ]);

                  $receiver->update([
                    'name' => $data['rname'],
                    'phone' => $data['rphone'],
                    'address' => $data['radd']
                ]);
              }
			}                                         
                return $ret;
           }
           
           function addTrackingHistory($data)
           {
           	
				#''tnum', 'location', 'remarks', 'status'
				$ret = TrackingHistory::create(['tnum' => $data['tnum'],                                                                                                          
                                                      'location' => $data['location'], 
                                                      'remarks' => $data['remarks'],                                                     
                                                      'status' => $data['status'], 
                                                      ]);
			    
                 $ret = Trackings::where('tnum',$data['tnum'])->first();
				 $ret->update(['status' =>  $data['status']]);
				
                return $ret;
				
           }
           
           function addShipper($data)
           {
           	
				#''tnum', 'location', 'remarks', 'status'
				$ret = Shippers::create(['tnum' => $data['tnum'],                                                                                                          
                                                      'name' => $data['name'], 
                                                      'phone' => $data['phone'],                                                     
                                                      'address' => $data['address'], 
                                                      ]);
			                                  
                return $ret;
           }
           
           function addReceiver($data)
           {
           	
				#''tnum', 'location', 'remarks', 'status'
				$ret = Receivers::create(['tnum' => $data['tnum'],                                                                                                          
                                                      'name' => $data['name'], 
                                                      'phone' => $data['phone'],                                                     
                                                      'address' => $data['address'], 
                                                      ]);
			                                  
                return $ret;
           }
		   
		   function getTracking($tnum, $params = [])
           {
           	$ret = [];
               $t = Trackings::where('tnum',$tnum)->first();
 
              if($t != null)
               {
               	#'tnum', 'stype', 'weight', 'origin', 'bmode', 'freight', 'mode', 'dest', 'desc', 'status'
                   $temp['id'] = $t->id; 
                   	     $temp['tnum'] = $t->tnum; 
                   	     $temp['stype'] = $t->stype; 
                            $temp['weight'] = $t->weight; 
                            $temp['origin'] = $t->origin; 
                            $temp['bmode'] = $t->bmode; 
                            $temp['freight'] = $t->freight; 
                            $temp['mode'] = $t->mode; 
                            $temp['description'] = $t->description; 
                            $temp['dest'] = $t->dest; 
							if(isset($params['rawDate']) && $params['rawDate'])
                            {
                                $temp['pickup_at'] = $t->pickup_at;
                            }
                            else
                            {
                                $temp['pickup_at'] = Carbon::createFromFormat('d/m/Y',$t->pickup_at)->format("jS F, Y");
                            }
                            $temp['status'] = $t->status; 
                         $temp['date'] = $t->created_at->format("jS F, Y"); 
                         $temp['last_updated'] = $t->updated_at->format("jS F, Y");

                         if(isset($params['mode']) && $params['mode'] == "all")
                         {
                             $temp['shipper'] = $this->getShipper($tnum);
                             $temp['receiver'] = $this->getReceiver($tnum);
                         }
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	

           function getTrackings($params = [])
           {
           	   $ret = [];
				   $trackings =  Trackings::where('id','>','0')->latest()->get();
				   
				   if($trackings != null)
				   {
					  foreach($trackings as $t)
					  {
                   	     $temp = $this->getTracking($t->tnum, $params);
                         array_push($ret,$temp); 
					  }
                    }                          
                                                      
                return $ret;
           }


  function getTrackingHistory($tnum)
           {
           	$ret = [];
 
              $trackings =  TrackingHistory::where('tnum',$tnum)->latest()->get();
				   
				   if($trackings != null)
				   {
					  foreach($trackings as $t)
					  {
                   	     $temp['id'] = $t->id; 
                   	     $temp['tnum'] = $t->tnum; 
                   	     $temp['location'] = $t->location; 
                            $temp['remarks'] = $t->remarks;                             
                   	     $temp['status'] = $t->status; 
                         $temp['date'] = $t->created_at->format("jS F, Y h:i A"); 
                         $temp['last_updated'] = $t->updated_at->format("jS F, Y h:i A");
                         array_push($ret,$temp); 
					  }
                    }                   
                                                      
                return $ret;
           }		   
           
           function getShipper($tnum)
           {
           	$ret = [];
               $t = Shippers::where('tnum',$tnum)->first();
 
              if($t != null)
               {
               	$temp = [];
                   $temp['id'] = $t->id; 
                   	     $temp['tnum'] = $t->tnum; 
                   	     $temp['name'] = $t->name; 
                            $temp['address'] = $t->address; 
                            $temp['phone'] = $t->phone;                            
                         $temp['date'] = $t->created_at->format("jS F, Y"); 
                         $temp['last_updated'] = $t->updated_at->format("jS F, Y");
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	
           
           function getReceiver($tnum)
           {
           	$ret = [];
               $t = Receivers::where('tnum',$tnum)->first();
 
              if($t != null)
               {
               	$temp = [];
                   $temp['id'] = $t->id; 
                   	     $temp['tnum'] = $t->tnum; 
                   	     $temp['name'] = $t->name; 
                            $temp['address'] = $t->address; 
                            $temp['phone'] = $t->phone;                            
                         $temp['date'] = $t->created_at->format("jS F, Y"); 
                         $temp['last_updated'] = $t->updated_at->format("jS F, Y");
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }

           function track($tnum)
		   {
			   $ret = [];
			  $ret['tracking'] = $this->getTracking($tnum);
			 $ret['shipper'] = $this->getShipper($tnum);
			 $ret['receiver'] = $this->getReceiver($tnum);
			 $ret['history'] = $this->getTrackingHistory($tnum);
             return $ret;
		   }		
           
           function getDashboardStats()
           {
               $ret = []; $temp = [];
               $ret['users'] = User::where('status','ok')->count();
               $ret['trackings'] = Trackings::where('id','>','0')->count();
               $ret['plugins'] = Plugins::where('status','active')->count();

               $topTrackings = Trackings::where('id','>','0')->latest()->paginate(5);
               foreach($topTrackings as $tt)
               {
                   $temp2 = $this->getTracking($tt->tnum,['mode' => "all"]);
                   array_push($temp,$temp2);
               }
               $ret['topTrackings'] = $temp;

               return $ret;
           }

           function removeTracking($data)
           {
               $tnum = $data['tnum'];
               $t = Trackings::where('tnum',$tnum)->first();

               if($t != null)
               {
                   Shippers::where('tnum',$tnum)->delete();
                   Receivers::where('tnum',$tnum)->delete();
                   TrackingHistory::where('tnum',$tnum)->delete();

                   $t->delete();
               }
           }
           
           
}
?>