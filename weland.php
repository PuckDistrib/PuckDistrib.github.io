<?php
$active_flag = "weland";
require 'header.php';
?>

                    <div class="tab-pane active" id="weland">
                        <h1>Weland</h1>
                        <p>Weland is a simple yet powerfull language to express decoupling intention. Its core predicate is of the form hide Xs except xs from Ys but-not-from ys.</p>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Named elements, scope and range</h3>
                            </div>
                            <div class="panel-body">
                                What we call a named element for Java is the declaration of one of the following elements : a package, a class, an interface, a constructor, a field or a method.
                                A scope is defined by a named element <i>e</i> and refers to the set of every nodes in the tree formed by the contain-arcs and rooted by <i>e</i>.
                                In the weland syntax, a named element can be prepended by <b>r:</b> where r stands for root. For a given named element <i>e</i> range(e)=scope(e) and range(r:e) = {e}.
                            </div>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Set Definition</h3>
                            </div>
                            <div class="panel-body">
                                <ul>
                                    <li><i>&lt;set_id&gt;</i><b>=[</b><i>possibly_rooted_named_element*</i><b>]</b></li>
                                    <li><i>&lt;set_id&gt;</i><b>=union([</b><i>set_id*</i><b>])</b><br/></li>
                                    <li>
                                        For convenience, there is an import clause of the form<br/>
                                        <b>import [</b><i>named_element</i><b>]</b>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Coupling predicates</h3>
                            </div>
                            <div class="panel-body">
                                <ul>
                                    <li><b>hide</b><i>&lt;scope_set&gt;[</i><b>except</b><i>&lt;scope_set&gt;][</i><b>from</b><i>&lt;scope_set&gt;][</i><b>but-not-from</b><i>&lt;scope_set&gt;]</i></li>
                                    <li><i>&lt;scope_set&gt;</i><b>friend-of</b><i>&lt;scope_set&gt;</i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
<?php
require 'footer.php';
?>
