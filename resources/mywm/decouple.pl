import ['com.mywm.model']

%% module Controller:       com.mywm.model.controller.**
%% module DAOFactory:       com.mywm.model.dao.hibernate.FactoryHibernate
%% module HibernateDAO:     "com.mywm.model.dao.hibernate.*DAO"
%% module DTO:              com.mywm.model.dto.*
%% module JPA:              javax.persistence.**
%% module Util:             com.mywm.util.*
%% module Model:            com.mywm.model.**
%% module Controller:       com.mywm.controller.**
%% module HibernateAPI:     org.hibernate.**
%% module SystemScheduling: com.mywm.controller.schedule.quartz.**
%% module QuartzAPI:        org.quartz.**

'HibernateDAO' = ['dao.hibernate.CustomerHibernateDAO',
		'dao.hibernate.ProductHibernateDAO',
		'dao.hibernate.PurchaseOrderHibernateDAO',
		'dao.hibernate.UserHibernateDAO']



%% hide ~= cannot-handle
%% with cannot-depend we can still create

%%Controller cannot-depend HibernateAPI
hide 'com.mywm.controller' from ['org.hibernate']
%%only DAOFactory can-create HibernateDAO
hide 'HibernateDAO' but-not-from ['dao.hibernate.FactoryHibernate']
%%only DTO can-annotated JPA
%%Controller cannot-handle HibernateDAO
hide 'HibernateDAO' from 'com.mywm.controller'
%Util can-only-depend Util, $java
hide 'com.mywm' from ['com.mywm.util'] % hideScope('com.mywm', [], ['com.mywm.util'], ['com.mywm.util']).
%Model can-only-throw com.mywm.model.dao.DAOException
%???
%%%only DTO, com.mywm.model.dao.hibernate.** can-depend org.hibernate.**
%only SystemScheduling can-depend QuartzAPI
hide 'org.quartz' but-not-from ['com.mywm.controller.schedule.quartz']
r:'org' friend-of 'org.quartz'
r:'com.mywm.model.dao.hibernate' friend-of 'HibernateDAO'
