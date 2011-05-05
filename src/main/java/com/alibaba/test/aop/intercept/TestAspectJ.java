package com.alibaba.test.aop.intercept;

import org.aspectj.lang.ProceedingJoinPoint;
import org.aspectj.lang.annotation.After;
import org.aspectj.lang.annotation.AfterThrowing;
import org.aspectj.lang.annotation.Around;
import org.aspectj.lang.annotation.Aspect;
import org.aspectj.lang.annotation.Before;
import org.springframework.stereotype.Component;

@Aspect
@Component
public class TestAspectJ {
	@Before ("execution(public void com.alibaba.test.aop.service.TestServiceImpl.process(String))")
    public void before(){
    	System.out.println("before....");
    }
	@After ("execution(public void com.alibaba.test.aop.service.TestServiceImpl.process(String))")
    public void after(){
    	System.out.println("after....");
    }
	@AfterThrowing ("execution(public void com.alibaba.test.aop.service.TestServiceImpl.process(String))")
    public void throwing(){
    	System.out.println("throwing....");
    }
	 
 	@Around ("execution(public void com.alibaba.test.aop.service.TestServiceImpl.process(String))")
     public Object around(ProceedingJoinPoint pjp) throws Throwable{
     	System.out.println("around....");
     	Object[] args = pjp.getArgs();// �����صĲ���
		if (null != args && args.length > 0) {
			args[0] = "��aspectjע�ⷽʽ�޸�";// �޸ı����صĲ���
			System.out.println("aspectj���޸�....");
		}
		Object retVal = pjp.proceed(args);
		
     	return retVal;
    }
}
