package com.alibaba.test.aop;

import org.springframework.context.ApplicationContext;
import org.springframework.context.support.FileSystemXmlApplicationContext;

import com.alibaba.test.aop.service.TestService;

public class TestAop {
	public static void main(String[] args) {
		ApplicationContext ctx = new FileSystemXmlApplicationContext("classpath:applicationContext.xml");
		TestService service = (TestService) ctx.getBean("testService");
		service.process("������ʱ������");
	}
}
