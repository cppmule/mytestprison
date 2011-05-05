package com.alibaba.test.aop.intercept;

import org.aopalliance.intercept.MethodInterceptor;
import org.aopalliance.intercept.MethodInvocation;

public class TestInterceptor implements MethodInterceptor {
	public Object invoke(MethodInvocation arg0) throws Throwable {
		if (arg0.getMethod().getName().equals("process")) {
			Object[] args = arg0.getArguments();// �����صĲ���
			if (null != args && args.length > 0) {
				System.out.println("" +
						"�еĲ���ֵ: " + args[0]);
				arg0.getArguments()[0] = "������ʱ�����";// �޸ı����صĲ���
				System.out.println("�޸ĺ�Ĳ���ֵ: " + args[0]);
			}
		}
		return arg0.proceed();
	}
}
