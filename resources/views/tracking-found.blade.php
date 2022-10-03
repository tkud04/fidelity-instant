<?php
 $t = isset($result['tracking']) ? $result['tracking'] : [];
 $shipper = isset($result['shipper']) ? $result['shipper'] : [];
 $receiver = isset($result['receiver']) ? $result['receiver'] : [];
 $history = isset($result['history']) ? $result['history'] : [];

 $bmodes = ['none' => "Select booking mode", 'paid' => "Paid", 'unpaid' => "Unpaid"];
 $statuses = ['none' => "Select status", 'station' => "ARRIVED AT STATION", 'hold' => "ON HOLD", 'transit' => "IN TRANSIT", 'delivery' => "OUT FOR DELIVERY", 'delivered' => "DELIVERED"];

?>
<section class="block">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                        <div class="search-found">
                            <div class="search-bar">
                                <label>Track Another Package:</label>
                                <form>
                                    <input type="text" id="track-another-tnum" placeholder="Enter your tracking number">
                                    <button type="submit" id="track-another-submit" class="theme-btn mt-3"><i class="fa fa-paper-plane"></i> SUBMIT</button>
                                </form>
                                <h4>Result Found: <span>"{{$t['tnum']}}: {{$t['origin']}} office - {{$t['dest']}} office"</span></h4>
                            </div>
                            <div class="top-margin mb-5">
                            <div class="news-box news-list">
                                <div class="news-thumb">
                                        <a href="javascript:void(0)" title="" itemprop="url"><img itemprop="image" src="images/resource/search-found-post.jpg" alt=""></a>
                                </div>
                                <div class="news-detail">
                                    <h2 itemprop="headline"><a itemprop="url" href="javascript:void(0)" title="">Shipment Travel History</a></h2>
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="table-responsive">
                                      <table class="table table-striped table-sm data-table">
                                        <thead>
                                           <tr>
                                             <th>Tracking #</th>
						                     <th>Location</th>
						                     <th>Status</th>
						                     <th>Date/Time</th>
						                     <th>Remarks</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($history as $h)
						                  <tr>
						                    <td>{{$h['tnum']}}</td>
						                    <td>{{$h['location']}}</td>
						                    <td>{{$statuses[$h['status']]}}</td>
						                    <td>{{$h['date']}}</td>
						                    <td>{{$h['remarks']}}</td>
						                  </tr>
						                  @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="top-margin">
                                <div class="news-box news-list">
                                    <div class="news-thumb">
                                        <a href="javascript:void(0)" title="" itemprop="url"><img itemprop="image" src="images/resource/search-found-post.jpg" alt=""></a>
                                    </div>
                                    <div class="news-detail">
                                        <h2 itemprop="headline"><a itemprop="url" href="javascript:void(0)" title="">Tracking Information</a></h2>
                                        <div class="row">
                                        <div class="col-md-6">
                                        <dl class="row">
                                           <dt class="col-md-3">Shipper name</dt>
                                           <dd class="col-md-9">{{$shipper['name']}}</dd>
                                           <dt class="col-md-3">Shipper phone</dt>
                                           <dd class="col-md-9">{{$shipper['phone']}}</dd>
                                           <dt class="col-md-3 mb-3">Shipper address</dt>
                                           <dd class="col-md-9 mb-3">{{$shipper['address']}}</dd>

                                           <dt class="col-md-3">Receiver name</dt>
                                           <dd class="col-md-9">{{$receiver['name']}}</dd>
                                           <dt class="col-md-3">Receiver phone</dt>
                                           <dd class="col-md-9">{{$receiver['phone']}}</dd>
                                           <dt class="col-md-3 mb-3">Receiver address</dt>
                                           <dd class="col-md-9 mb-3">{{$receiver['address']}}</dd>
                                           <dt class="col-md-3 mb-3">Description</dt>
                                           <dd class="col-md-9 mb-3">{{$t['description']}}</dd>                                           
                                           <dt class="col-md-3">Tracking #</dt>
                                           <dd class="col-md-9">{{$t['tnum']}}</dd>
                                          
                                       </dl>
                                        </div>
                                        <div class="col-md-6">
                                        <dl class="row">
                                           <dt class="col-md-3">Ship Type</dt>
                                           <dd class="col-md-9">{{$t['stype']}}</dd>
                                           <dt class="col-md-3 mb-3">Weight</dt>
                                           <dd class="col-md-9 mb-3">{{$t['weight']}}kg</dd>
                                           <dt class="col-md-3">Origin office</dt>
                                           <dd class="col-md-9">{{$t['origin']}}</dd>
                                           <dt class="col-md-3">Destination office</dt>
                                           <dd class="col-md-9">{{$t['dest']}}</dd>
                                           <dt class="col-md-3">Date issued</dt>
                                           <dd class="col-md-9">{{$t['date']}}</dd>
                                           <dt class="col-md-3 mb-3">Pickup date</dt>
                                           <dd class="col-md-9 mb-3">{{$t['pickup_at']}}</dd>
                                           <dt class="col-md-3">Booking mode</dt>
                                           <dd class="col-md-9"><span class="badge bg-primary">{{strtoupper($t['bmode'])}}</span></dd>
                                           <dt class="col-md-3">Total freight</dt>
                                           <dd class="col-md-9">${{number_format($t['freight'],2)}}</dd>
                                       </dl>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>											
					</div>
				</div>
			</div>
		</section>