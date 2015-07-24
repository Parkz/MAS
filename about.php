<?php

require('./includes/config.inc.php');

require('./Includes/mysql.inc.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
	include('./includes/login.inc.php');
}

include('./includes/header.html');
/* PAGE CONTENT STARTS HERE! */
?>
<h1>MAS Purpose Statement</h1>
  <p>Scientists of the State of Missouri organized in 1934 to form the Missouri Academy of Science. By April 6, 1934, a Constitution and By-Laws were prepared and on August 14, 1934, the organization was incorporated.</p>
  <p>The purposes of this Academy were presented in the fourth <em>article of agreement</em> as follows:</p>
  <div class="italics">
   <p><em>This corporation is organized, not for profit but for the purposes of promoting the increase and the diffusion of scientific spirit, and of promoting cooperation between the scientific interests of Missouri. It proposes to accomplish these purposes:</em></p>
  <ul>
  	<li><em>By holding meetings for the presentation of scientific papers embodying the results of original research, teaching experience, or other information of scientific interest.</em></li>
	<li><em>By fostering public interest in scientific matters, through open meetings, press releases, and in such other ways as seem feasible.</em></li>
	<li><em>By encouraging local scientific organizations in every possible way.</em></li>
	<li><em>By promoting acquaintance in harmonious relationships between scientists in Missouri, and among all who are interested in science.</em></li>
	<li><em>By supplying, so far as finances permit, a medium for the publication of results of original work, particularly those of special interst in this state.</em></li>
	<li><em>By concerning itself with legislation on scientific matters, and providing opportunity for discussion of such legislation.</em></li>
	<li><em>By working in any and all other ways which may prove feasible, for the advancement of science in Missouri.</em></li>
  </ul>
  </div><!-- end .italics -->
  <p>The Academy held its organizational meeting on April 13-14, 1934 with 250 people attending. At the December, 1934, meeting, more than 400 people registered and by May, 1935, there were approximately 750 members of the Academy. Statewide interest at a high level continued until activities made necessay by World War II caused disruption of Academy Affairs except for some activity in the College Section.</p>
  <p>Post-war revival of Academy activities started at a meeting on April 20, 1963 at Drury College. From the group of twelve persons who initiated the reactivation of the Academy in 1963, the membership has grown steadily to more than 800. Activities of the Academy have expanded to include the awarding of modest grants for projects proposed by high-school and college students, and to sponsor the establishment of a Junior Academy of Science.</p>
  <p>Since its reactivation in 1963, the Missouri Academy of Science has regularly held annual meetings at 16 different sites around the state. The refereed publication, the Transactions of the Missouri Academy of Science, has been published consistently since 1967. Six Occasional papers have also been released.</p>
  <p>Presently, 49 colleges and universities around the State of Missouri hold an Institutional Membership Status. Many industries and other private businesses are supporting the Academy with Corporate Memberships.</p>
  <p>Membership into the Academy is a year-round opportunity for everyone and runs from January 31 to December 31. Benefits include four quarterly newsletters, one annual Transactions, and annual meeting lower pre-registration fee.</p>
  <p>The Missouri Academy of Science is a non-profit organization and is supported solely by membership dues and donations. That is why we appreciate each new member and the current members who renew so faithfully each year. And it is because of their interst that the Academy continues its success as a fine scientific organization.</p>


<?php
require('./includes/footer.html');
?>