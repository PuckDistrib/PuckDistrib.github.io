module Controller:       com.mywm.controller.**
module DAOFactory:       com.mywm.model.dao.hibernate.FactoryHibernate
module HibernateDAO:     "com.mywm.model.dao.hibernate.*DAO"
module DAOException:     com.mywm.model.dao.DAOException
module SystemScheduling: com.mywm.controller.schedule.**
module QuartzAPI:        org.quartz.**
module Model:			 "com.mywm.model(.)*DAO"

only DAOFactory can-create HibernateDAO
Controller cannot-handle HibernateDAO
Model can-throw-only DAOException
only SystemScheduling can-depend QuartzAPI
