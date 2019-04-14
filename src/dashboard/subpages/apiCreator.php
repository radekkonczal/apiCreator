<section class="element" id="row_creator">
	<h4 align="center">Add new element:</h4>
	<div class="container">
	    <div class="row">
	      <div class="col-12 col-lg-3">
	        <div class="col d-flex justify-content-center">
	          <h5>Exchange:</h5>
	        </div>
	        <div class="col d-flex justify-content-center">
	            <select class="select" name="exchange" id="exchange"></select>
	        </div>
	      </div>
	      <div class="col-12 col-lg-3">
	        <div class="col d-flex justify-content-center">
	          <h5>First currency:</h5>
	        </div>
	        <div class="col d-flex justify-content-center">
	          <select class="select" name="from_currency" id="from_currency">
	          <option class="option">Select exchange first</option>
	        </select>
	        </div>
	      </div>
	      <div class="col-12 col-lg-3">
	        <div class="col d-flex justify-content-center">
	          <h5>Second currency:</h5>
	        </div>
	        <div class="col d-flex justify-content-center">
	          <select class="select" name="to_currency" id="to_currency">
	          <option class="option">Select exchange first</option>
	        </select>
	        </div>
	      </div>
	      <div class="col-12 col-lg-3">
	        <div class="col d-flex justify-content-center"><h5>Create row:</h5></div>
	        <div class="col d-flex justify-content-center">
	          <button type="submit" id="add" onclick="sendSingleRow()"><i class="fas fa-plus"></i> Add</button>
	        </div>
	      </div>
	    </div>
	</div>
</section>

<section class="element row d-flex justify-content-center">
	<div class="col-12 col-md-10 col-lg-8">
		<h4 align="center">List of elements:</h4></br>
		<div id="in_preeparation_list"></div>
		<div class="col d-flex justify-content-center">
	          <button type="submit" id="removeAll" onclick="removeAllInPreparation()"><i class="fas fa-trash-alt"></i> Remove All</button>
	     </div>
		
	</div>
</section>

<section class="element row d-flex justify-content-center">
		<div class="col-12 col-md-6 col-lg-5 col-xl-4 d-flex justify-content-center">
			<div id="apiName">
				<input class="inputs" id="inApiName" type="text" placeholder="API's name">
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-5 col-xl-4 d-flex justify-content-center">
			<button type="submit" id="createApi" onclick="createApi()"><i class="fas fa-plus"></i> Create personalized API</button>
		</div>
</section>
