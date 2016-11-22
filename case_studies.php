<?php
$active_flag = "case_studies";
require 'header.php';
?>
<h1>Case Studies</h1>
<h2><span class="label label-success"><?php echo dl_link("freemind", "Freemind"); ?></span></h2>
<p>We extracted the <a href="http://freemind.sourceforge.net/wiki/index.php/Main_Page">Freemind</a> case study from the <a href="http://qualitascorpus.com/">qualitas corpus</a>.
We made the hypothesis, from its name, that the freemind.common package is a package used throughout the remaining of the software.
This package should thus be stable. To enforce this stability it should only depends on itself. This can be made explicit with the following Weland constraint:<p/>
<div class="weland">  hide all-freemind from common </div>
<p> where all-freemind is a set referring to every packages of freemind. An archive containing the sources of the freemind 0.9.0, the coupling constraint and the refactoring plan can be found <?php echo dl_link("freemind", "here");?>.</p>

<p>81 violations are found. We remove 77 of them in only 9 steps.</p>
<ul>
    <li>main.Resources is the target of 20 violations. It is used by 86 classes or interfaces in 21 packages. We move it into common.</li>
    <li>main.Tools and main.FreeMindMain which are used by 101 classes in 19 packages and 85 classes in 22 packageds respectively are also move in common. Since FreeMindMain is an interface, it is arguable that its place is rather in common than in the main package.</li>
    <li>We place Tools providers, main.Base64Coding, main.FreeMindCommon and main.HtmlTools along with him in the common package.</li>
    <li>common.XmlBindingTools is only used by 4 classes in 4 packages thus it is doubtfull that its place is in the common package. 3 of its providers (out of four not counting external providers) are in the controller package, so we place it there. </li>
    <li>common.IconProperty is the source of 13 violations (on the 35 remaining at this phase). It is a subclasse of java.awt.event.ActionListener which sole method is actionPerformed. Hence its subclasses could be put in the controller package.
There are ActionListener implementation in the common package: ColorProperty, ComboProperty, FontProperty, IconProperty, ScriptEditorProperty and ThreeCheckBoxProperty. Except for ComboProperty, these classes are all sources of violations and have between one and two clients. We do move them in the controller package.</li>

    <li>common.RemindValueProperty which use ThreeCheckBox is also move in the controller package.</li>
    <li>common.OptionalDontShowMeAgainDialog is move alongside its provieder in controller package.</li>
    <li>main.FixedHtmlWriter and its subclass main.XHTMLWriter that is used by common.HtmlTools are moved in the common package.</li>
    <li>Finally we move the two static methods common.Tools.setDialogLocationRelativeTo and common.Tools.getFileNameProposal which have providers in the mode and view packages in the  main.Freemind class.</li>
</ul>

<p>The remainging violations calls for numerous interfaces to be broken. We decided to stop the refactoring here. Once these operations performed, the code can be generated.</p>

<h2><span class="label label-success"><?php echo dl_link("screen", "Screen");?></span></h2>
<p>The Screen study case is inspired from a bridge design pattern example written by <a href="http://dl.acm.org/citation.cfm?id=582436">Jan Hannemann</a>.
It can be downloaded <?php echo dl_link("screen", "here");?>.
Conforming to the design pattern goal, which is to decouple an abstraction from its implementation, we devised the following constraint :</p>
<div class="weland"> hide printers from screens </div>
<p>This example is taking care of much finer grain details than the previous one. The hidden elements are methods and not whole packages.<br/>
There are 8 violations to break. This is done by creating new classes to move the forbidden methods and introducing a common interface. Once all violations removed, several more transformations will make the bridge design pattern emerge.</p>

<?php
require 'footer.php';
?>
