<?php
require('./includes/config.inc.php');

require('./Includes/mysql.inc.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
	include('./includes/login.inc.php');
}

include('./includes/header.html');
/* PAGE CONTENT STARTS HERE! */
?>
<div  class="contactblocks">
<h3>MAS Executive Committee</h3>
</div>

<div class="contactblocks">
<p>
President<br />
Robert K. Heth<br />
Biology and Environmental Health <br />
Missouri Southern State University<br />
3950 East Newman Road<br />
Joplin, MO 64081-1595<br />
            417-625-9698<br />      
heth-r@mssu.edu
</p>
</div>
<div class="contactblocks">
<p>
President-Elect<br />
Michael Aide<br />
133 Rhodes Hall<br />
Southeast Missouri State University<br />
One University Plaza<br />
Cape Girardeau, MO 63701-4799<br />
            573-651-2796      <br />
mtaide@semo.edu
</p>
</div>

<div class="contactblocks">
<p>
Vice President<br />
Joe Ely<br />
Biology Department<br />
University of Central Missouri<br />
Warrensburg, MO 64093<br />
            660-543-8785      <br />
ely@ucmo.edu
</p>
</div>

<div class="contactblocks">
<p>
Past President<br />
Anthony R. Lupo<br />
Atmospheric Science Program<br />
University of Missouri-Columbia<br />
302 ABNR Building<br />
Columbia, MO 65211<br />
            573-884-1638      <br />
LupoA@missouri.edu
</p>
</div>

<div class="contactblocks">
<p>
Secretary<br />
Steven Mills<br />
Biology Department<br />
University of Central Missouri<br />
306 Broad Street<br />
Warrensburg, MO 64093<br />
smills@ucmo.edu
</p>
</div>

<div class="contactblocks">
<p>
Treasurer<br />
Mary F. Haskins<br />
Biology Department<br />
Rockhurst University<br />
1100 Rockhurst Road<br />
Kansas City, MO 64110<br />
            816-501-4006  <br />    
mary.haskins@rockhurst.edu<br />
</p>
</div>

<div class="contactblocks">
<p>
Historian<br />
Lee Likins<br />
012 Biological Sciences Building<br />
University of Missouri Kansas City<br />
5100 Rockhill Road<br />
Kansas City, MO 64110<br />
            816-235-2875      <br />
likinsl@ucmo.edu
</p>
</div>

<div class="contactblocks">
<p>
Collegiate Division State Director<br />
James S. Gordon<br />
Department of Science<br />
Central Methodist College<br />
411 CMC Square<br />
Fayette, MO 65248<br />
            660-248-6235      <br />
jgordon@centralmethodist.edu
</p>
</div>

<div class="contactblocks">

<p>Junior Division State Director</p><br />
Michael Ottinger<br />
CSMP Department<br />
Missouri Western State University<br />
Saint Joseph, MO 64507<br />
            816-271-4376      <br />
ottinger@missouriwestern.edu
</p>
</div>

<div class="contactblocks">
<p>
Business Office<br />
Missouri Academy of Science<br />
Attn: Paula L. Macy<br />
W.C. Morris 206A<br />
University of Central Missouri<br />
Warrensburg, MO 64093<br />
            660-543-8734      <br />
macy@ucmo.edu
</p>
</div>
<?php
require('./includes/footer.html');
?>